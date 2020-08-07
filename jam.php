
<div id="content">
  <div id="content-header">
  </div>
  <div class="container-fluid" style="background: url(night.jpg); background-size: cover; padding: 250px;"><hr>
    <h1 align="center" style="color: white; font-size: 75px; opacity: 70%;  ">
    WELCOME
    </h1>
    <?php
    date_default_timezone_set("Asia/Bangkok");
    ?>

    <script type="text/javascript">
      function date_time(id)
      {
      date = new Date;
      year = date.getFullYear();
      month = date.getMonth();
      months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
      d = date.getDate();
      day = date.getDay();
      days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
      h = date.getHours();
      if(h<10)
      {
      h = "0"+h;
      }
      m = date.getMinutes();
      if(m<10)
      {
      m = "0"+m;
      }
      s = date.getSeconds();
      if(s<10)
      {
      s = "0"+s;
      }
      result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;
      document.getElementById(id).innerHTML = result;
      setTimeout('date_time("'+id+'");','1000');
      return true;
      }
      </script>

      <h1 align="center" style="color: white"><i><span id="date_time"><</span></i><h1>
      <script type="text/javascript">window.onload = date_time('date_time');</script>
      </div>
  <div class="container-fluid">
  </div>
</div>
<!--Footer-part-->