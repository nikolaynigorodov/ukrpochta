<?php

namespace App\Http\Controllers;

use App\Events\OrderCreate;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\FileUploadServices;

class OrderController extends Controller
{
    /**
     * @var FileUploadServices
     */
    private $fileUpload;

    public function __construct(FileUploadServices $fileUpload)
    {
        $this->fileUpload = $fileUpload;
    }

    public function showApplicationForm()
    {
        return view("order.form");
    }

    public function storeApplication(OrderRequest $request)
    {
        $order = $this->create($request->validated());

        if($order) {

            event(new OrderCreate($order));

            return redirect(route("home"))->with('success','You have successfully sent the order.');
        }
        return redirect(route("home"))->with('error','Error. The application has not been sent.');
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
