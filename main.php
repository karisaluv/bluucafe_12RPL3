<?php

//fungsi session untuk menjaga / memelihara informasi akses dari seorang pengakses / pemakai aplikasi web
//session_start();
if (empty($_SESSION['username_bluucafe'])) {
    header('location:login');
}

include "controllers/c_koneksi.php";
$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[username_bluucafe]'");

$hasil = mysqli_fetch_array($query);
?>


<!--    CONTENT     -->
<?php

include $page;

?>
<!--   END OF CONTENT     -->

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


<!-- JAVA SCRIPT -->


<script>

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<!--END OF JavaScript-->






</body>

</html>
