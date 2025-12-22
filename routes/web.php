<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// 1. Route เปิดหน้าฟอร์ม
Route::get('/html101', function () {
    return view('html101');
});

// 2. Route รับข้อมูลและบันทึกรูป
Route::post('/submit-workshop', function (Request $request) {
    // รับข้อมูลทั้งหมด
    $data = $request->all();

    // จัดการไฟล์รูปภาพ
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');

        // ตั้งชื่อไฟล์ใหม่ (ใช้เวลาปัจจุบัน + ชื่อเดิม ป้องกันชื่อซ้ำ)
        $filename = time() . '_' . $file->getClientOriginalName();

        // ย้ายไฟล์ไปเก็บที่โฟลเดอร์ public/uploads
        $file->move(public_path('uploads'), $filename);

        // เก็บชื่อไฟล์ไว้ส่งไปหน้า View
        $data['photo_name'] = $filename;
    } else {
        $data['photo_name'] = null;
    }

    // ส่งข้อมูลไปหน้า result
    return view('result', compact('data'));
})->name('workshop.submit');
