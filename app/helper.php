<?php
function fileUpload($file, $folder) {
    $newName = now()->format('Y-m-d') . '_' . $file->hashName();
    $path = Storage::disk('public')->putFileAs($folder,$file, $newName);
    return $path;
}