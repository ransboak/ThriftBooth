<!--
    - FOOTER
  -->

<!--
- FOOTER
-->


<script src="./assets/js/script.js"></script>
<script src="./assets/js/script2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--
      - ionicon link
    -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
  $(document).ready(function() {
    $(".user").click(function() {
      $(".profile-div").toggle(1000);
    });
    $(".hicon:nth-child(1)").click(function() {
      $(".notification-div").toggle(1000);
    });
    $(".sicon").click(function() {
      $(".search").toggle(1000);
    });
  });
</script>

<script type="text/javascript">
  $('li').click(function() {
    $('li').removeClass("active");
    $(this).addClass("active");
  });
</script>
</body>

</html>