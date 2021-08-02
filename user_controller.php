<?php

require_once("db_controller.php");

function createProfile($nama, $username, $domisili, $email, $password)
{
    $conn = connect();

    if ($conn != null) {
        if ($nama != null && $username != null && $domisili != null && $email != null && $password != null) {


            $query = $conn->prepare("INSERT INTO `user`(`nama`, `username`, `domisili`, `email`, `password`) VALUES (?,?,?,?,?);");
            $query->bind_param("sssss", $nama, $username, $domisili, $email, $password);
            $query->execute() or die(mysqli_error($conn));

            // // Check image type
            // $mime_type = explode("/", $mime, 2);

            // if (validateType($mime_type)) {
            //     $target_dir = "profile_picture/";
            //     $path = pathinfo($_FILES['profile_picture']['name']);
            //     $profile_picture_tmp_name = $_FILES['profile_picture']['tmp_name'];
            //     $basename = $path['basename'];
            //     $path_basename = $target_dir . nowFileFormat() . "_" . str_replace(' ', '_', $basename);

            //     if (!file_exists($path_basename)) {
            //         move_uploaded_file($profile_picture_tmp_name, $path_basename);

            //         $query = $conn->prepare("INSERT INTO `user_profile`(`user_id`, `profile_picture`, `nama`, `email`, `password`, `tipe_user`) VALUES (?,?,?,?,?,?);");
            //         $query->bind_param("ssssss", $user_id, $path_basename, $nama, $email, $password, $tipe_user);
            //         $query->execute() or die(mysqli_error($conn));
            //     }
            // }
        }
    }
    close($conn);
}
