<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/he.min.js"></script>
<script src="<?= URL; ?>public/js/core/popper.min.js"></script>
<script src="<?= URL; ?>public/js/core/bootstrap.min.js"></script>

<!-- <script src="public/js/core/jquery.min.js"></script> -->
<script src="<?= URL; ?>public/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= URL; ?>public/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= URL; ?>public/js/plugins/chartjs.min.js"></script>
<script src="<?= URL; ?>public/js/plugins/jssor.slider-28.1.0.min.js"></script>
<script src="<?= URL; ?>public/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
<script src="<?= URL; ?>public/js/slider.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.8/index.global.min.js"></script>
<script type="application/javascript" src="<?= URL ?>public/js/report.js"></script>
<script type="module" src="<?= URL; ?>public/js/main.js"></script>
<script type="module" src="<?= URL; ?>public/js/admin.js"></script>

<script src="<?= URL; ?>public/js/datatable/table.js"></script>
<script src="<?= URL; ?>public/js/datatable/table1.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<script type="text/javascript">
  let jssor_1 = document.getElementById('jssor_1');
  if (jssor_1) {
    jssor_1_slider_init();
  }


  Number.prototype.pad = function(n) {
    for (var r = this.toString(); r.length < n; r = "0" + r);
    return r;
  };

  function updateClock() {
    var now = new Date();
    var utcOffset = now.getTimezoneOffset();
    var manilaOffset = 480;
    var localOffset = utcOffset + manilaOffset;
    var localTime = new Date(now.getTime() + localOffset * 60000);

    var milli = localTime.getMilliseconds(),
      sec = localTime.getSeconds(),
      min = localTime.getMinutes(),
      hou = localTime.getHours(),
      mo = localTime.getMonth(),
      dy = localTime.getDate(),
      yr = localTime.getFullYear();
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var tags = ["mon", "d", "y", "h", "m", "s", "mi"],
      corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2), milli];

    // Convert to 12-hour format
    var ampm = hou >= 12 ? "pm" : "am";
    hou = hou % 12;
    hou = hou ? hou : 12;

    // Add leading zero to hours if needed
    hou = hou.pad(2);

    // Update the time display
    let tH = document.getElementById("h");
    let tM = document.getElementById("m");
    let tSec = document.getElementById("s");
    let tAmpm = document.getElementById("ampm")

    if (tH && tM && tSec && tAmpm) {
      tH.textContent = hou;
      tM.textContent = min.pad(2);
      tSec.textContent = sec.pad(2);
      tAmpm.textContent = ampm;
    }

    var dateElement = document.getElementById("date");
    if (dateElement) {
      dateElement.textContent = months[mo] + " " + dy + ", " + yr;
    }
  }

  function initClock() {
    updateClock();
    setInterval(updateClock, 1000); // Update the clock every second
  }

  initClock();
</script>