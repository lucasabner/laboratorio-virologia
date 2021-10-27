<footer class="main-footer">
    <div class="col-lg-12 text-center" vertical-align="middle"><small>&copy; 2021 by <a target="_blank"
                href="http://unipampa.edu.br">UNIPAMPA</a></small></div>
    </div>
</footer>
<div class="control-sidebar-bg"></div>


<!-- jQuery -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- JavaScript Chat-->
<script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>assets/js/fastclick.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.slimscroll.min.js"></script>

<script src="<?= base_url() ?>assets/js/demo.js"></script>




<script>
// Click handler can be added latter, after jQuery is loaded...
$('.sidebar-toggle').click(function(event) {
    event.preventDefault();
    if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
        sessionStorage.setItem('sidebar-toggle-collapsed', '');
    } else {
        sessionStorage.setItem('sidebar-toggle-collapsed', '1');
    }
});
</script>


<script type="text/javascript">
var baseurl = "<?php print base_url(); ?>";
</script>

<script>
window.onload = hideLoginErrors();

function hideLoginErrors() {
    $("#login-empty-input").hide();
}

function checkEmptyInput() {
    hideLoginErrors();
    $("#login-invalid-input").hide();
    if ($("#email").val() == '' || $("#password").val() == '') {
        $("#login-empty-input").show();
        return false;
    }
}
</script>

<!-- ToolTip -->
<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>


<script>
$(document).ready(function() {
    $('.sidebar-menu').tree()
})
</script>
<script>
//código usando jQuery
$(document).ready(function() {
    $('.load').hide();
});
</script>