@component('mail::message')

<p>Hallo, {{$sale->user->name}}</p>
<p>Terimakasih telah melakukan pembelian di toko kami silahkan klik button dibawah ini untuk melakukan
    upload pembayaran anda terimakasih
</p>
<P>Kode Invoice : {{$sale->invoice}}</P>
@component('mail::button', ['url' => "http://askes.test/user/ambil-form/{$sale->id}"])
upload pembayaran
@endcomponent
@endcomponent
