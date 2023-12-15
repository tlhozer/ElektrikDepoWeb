<?php
// Veritabanı bağlantısı için gerekli bilgileri düzenleyin
$servername = "testkarakoy";
$username = "karakoydb";
$password = "karakoy11!!";
$dbname = "	karakoyelektrik_";

// Veritabanı bağlantısını oluşturun
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol edin
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

// Form gönderildiğinde işlemleri gerçekleştirin
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alın
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Veritabanına veri ekleme sorgusu
    $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Sorguyu çalıştırın ve sonucu kontrol edin
    if ($conn->query($sql) === TRUE) {
      
       
        echo '<script>alert("Mesajınız başarıyla gönderildi.")</script>';
       
    


      
    } else {
        echo "Veri eklerken hata oluştu: " . $conn->error;
    }
}

// Veritabanı bağlantısını kapatın
$conn->close();
?>
