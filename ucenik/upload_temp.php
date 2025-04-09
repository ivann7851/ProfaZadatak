<?php
$uploadDir = '../temp/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['filetoupload']) && $_FILES['filetoupload']['error'] == 0) {
        $fileName = time() . "_" . basename($_FILES['filetoupload']['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['filetoupload']['tmp_name'], $filePath)) {
            echo json_encode(['status' => 'success', 'file' => $fileName]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Greška prilikom spremanja.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Nema datoteke.']);
    }
}
?>
