<?php
    session_unset();
    
    session_destroy();
    echo "<script>
        window.location = 'ingreso';
    </script>";