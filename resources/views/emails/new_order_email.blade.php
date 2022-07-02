<div class="container">
    <h1>New Order</h1>
    <p>Title: {{ $order->title }}</p>
    <p>Message: {{ $order->message }}</p>
    <p>User Name: {{ $order->user->name }}</p>
    <p>User Email: {{ $order->user->email }}</p>
    <p><a href="{{request()->getBaseUrl() . '/public' . $order->file}}">File</a></p>
</div>
