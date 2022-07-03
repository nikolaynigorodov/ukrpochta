<?php

namespace App\Http\Controllers;

use App\Events\OrderCreate;
use App\Helpers\CheckDateOrder;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\FileUploadServices;

class OrderController extends Controller
{
    /**
     * @var FileUploadServices
     */
    private $fileUpload;
    /**
     * @var CheckDateOrder
     */
    private $checkDateOrder;

    public function __construct(FileUploadServices $fileUpload, CheckDateOrder $checkDateOrder)
    {
        $this->fileUpload = $fileUpload;
        $this->checkDateOrder = $checkDateOrder;
    }

    public function showApplicationForm()
    {
        return view("order.form", [
            'checkForm' => $this->checkDateOrder->checking()
        ]);
    }

    public function storeApplication(OrderRequest $request)
    {
        if(!$this->checkDateOrder->checking()) {
            $order = $this->create($request->validated());

            if($order) {
                event(new OrderCreate($order));
            }

            return redirect(route("home"));
        }
    }

    protected function create(array $data)
    {
        return Order::create([
            'title' => $data['title'],
            'message' => $data['message'],
            'user_id' => $data['user_id'],
            'answer' => $data['answer'],
            'file' => $this->fileUpload->fileSave($data['file']),
        ]);
    }
}
