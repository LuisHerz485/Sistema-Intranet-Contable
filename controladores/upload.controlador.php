<?php
include 'google-api-php-client-2.9.1/vendor/autoload.php';

class ControladorUpload
{
    static public function ctrSubirArchivo()
    {
        //Llenar con json de API
        putenv('GOOGLE_APPLICATION_CREDENTIALS=');

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->SetScopes(['https://www.googleapis.com/auth/drive.file']);

        $iddrive = $_SESSION['iddrive'];
        $nombre = $_SESSION['nombre'];

        if (isset($_FILES['archivos']['tmp_name']) && !empty($_FILES['archivos']['tmp_name'])) {
            try {
                foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {
                    $service = new Google_Service_Drive($client);
                    $file_path = $_FILES['archivos']['tmp_name'][$key];

                    $file = new Google_Service_Drive_DriveFile();
                    $file->setName($_FILES['archivos']['name'][$key]);

                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mime_type = finfo_file($finfo, $file_path);

                    $file->setParents(array($iddrive));
                    $file->setDescription("Subido por: " . $nombre . "| Gracias a la Intranet de FC Contadores");
                    $file->setMimeType($mime_type);

                    $resultado = $service->files->create(
                        $file,
                        array(
                            'data' => file_get_contents($file_path),
                            'mimeType' => $mime_type,
                            'uploadType' => 'media'
                        )
                    );
                }

                echo "<script>
                        Swal.fire({ 
                            title:	'Correcto!',
                            text:	'¡Subida de archivo exitoso!',
                            icon:	'success',
                            confirmButtonText:	'Ok'
                            }).then((result)=>{
                                if(result.value){
                                window.location='upload';
                            }
                        })
                    </script>";
            } catch (Google_Service_Exception $gs) {
                $mensaje = json_decode($gs->getMessage());
                echo $mensaje->error->message();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
