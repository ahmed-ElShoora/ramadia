{{--<form method="post" action="/check-out/telr">
  @csrf
  <input hidden name="id" value="1">
  <input hidden name="price" class="input_price" value="2000">
  <div class="form">
    <select class="option type" required name="type">
      <option hidden>"Type Of ticket"</option>
      <option value='normal'>Normal</option><option value='vip'>VIP</option>
    </select>
    <p>الرجاء ادخال البيانات التالية لإكمال عملية الحجز</p>
    <input type="text" placeholder="Name" name="name" required>
    <input type="text" placeholder="Age" name="age" required>
    <input type="email" placeholder="Email" name="email" required>
    <input type="tel" placeholder="Telephone number : 966 51 111 1111" name="tel" required>
    <input type="text" placeholder="Town" name="town" required>
    <div class="vailed">
      <p></p>
    </div>
    <div class="btn btn-oreder-done">
      <button type="submit" style="background:${data.color_button};">Buy</button>
    </div>
  </div>
</form>
<p align="center" style="overflow-x:auto;">
  <iframe id="telrPaymentFrame" name="telrPaymentFrame" src="{{ $url }}" style="width: 50%;min-width: 600px;height: 600px;frameborder: 0;" /></iframe>
</p>--}}