<div style="font-family:verdana;font-size:12px;color:#555555;line-height:14pt">
<div style="width:590px">
<div style="background:url('{{url('assets/image/email_top.png')}}') no-repeat;width:100%;height:75px;display:block">
<div style="padding-top:30px;padding-left:50px;padding-right:50px">
<a href="#" target="_blank" ><img src="{{url('assets/image/logo-website.png')}}" alt=""
  style="border:none; height:42px;" ></a>
</div>
</div>
<div style="background:url('{{url('assets/image/email_mid.png')}}')
repeat-y;width:100%;display:block">
<div style="padding-left:50px;padding-right:50px;padding-bottom:1px">
<div style="border-bottom:1px solid #ededed"></div>
<div style="margin:20px 0px;font-size:27px;line-height:30px;text-align:left">แจ้งชำระเงิน</div>
<div style="margin-bottom:30px">
<div>คุณสั่งซื้อ สินค้าจาก fulryu</div>
<br>
<div style="margin-bottom:20px;text-align:left">
  <b>หมายเลขคำสั่งซื้อ:</b> {{$data->order_id}}<br>
  <b>วันที่:</b> {{$datatime}}<br>
  <b>ชื่อ:</b> {{$data->name}}<br>
  <b>เบอร์โทร:</b> {{$data->phone}}<br>
  <b>ยอดเงิน:</b> {{$data->money}}<br>
  <b>วันที่แจ้งโอน:</b> {{$data->date_transfer}}, {{$data->time_transfer}}<br>
  <b>หมายเหตุ:</b> {{$data->note}} <br>
  <b>หลักฐานการโอน</b><br />
  <img src="{{url('assets/image/slip_image/'.$data->slip_image)}}"
    style="border:none; height:200px;" >
</div>
</div>
<div>
<div style="border-bottom:1px solid #ededed"></div>
</div><div style="margin:20px 0">หากมีคำถาม ติดต่อ <a href="#" target="_blank" >+(66)639911075</a>
</div><div style="border-bottom:1px solid #ededed"></div>
<div style="border-bottom:1px solid #ededed">
</div>
<div style="margin:20px 0 40px 0;font-size:10px;color:#707070">
ดู<a href="https://www.fulryu.com/my_order" target="_blank">ประวัติการสั่งซื้อ</a>
บน fulryu ข้อมูลส่วนตัวของคุณ<br>
ดู<a href="https://www.fulryu.com/return_policy" target="_blank" >นโยบายการคืนเงิน</a>ของ fulryu และ<a href="https://www.fulryu.com/term_of_service" target="_blank">ข้อกำหนดในการให้บริการ</a>
</div>
<div style="font-size:9px;color:#707070">

<br>© 2019 fulryu | สงวนลิขสิทธิ์<br> fulryu ถนนพหลโยธิน แขวงลาดยาว
เขตจตุจักร กรุงเทพมหานคร ประเทศไทย 10900</div>
</div></div>
<div class="yj6qo"></div>
<div style="background:url('{{url('assets/image/email_bottom.png')}}') no-repeat;width:100%;height:50px;display:block"></div></div></div>
