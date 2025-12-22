<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ 1. เปิดเว็บมาเจอหน้าฟอร์มเลย (Route '/')
Route::get('/', function () {
    return view('html101');
});

// ✅ 2. รับข้อมูลจากฟอร์ม + บันทึกรูปภาพ
Route::post('/submit-workshop', function (Request $request) {
    // รับข้อมูลทั้งหมด
    $data = $request->all();

    // ตรวจสอบและบันทึกรูปภาพ
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');

        // ตั้งชื่อไฟล์ใหม่ (ใช้เวลาปัจจุบันนำหน้า กันชื่อซ้ำ)
        $filename = time() . '_' . $file->getClientOriginalName();

        // บันทึกลงโฟลเดอร์ public/uploads (ต้องสร้างโฟลเดอร์นี้ไว้ก่อนนะ)
        $file->move(public_path('uploads'), $filename);

        // เก็บชื่อไฟล์ไว้ส่งไปแสดงผล
        $data['photo_name'] = $filename;
    } else {
        $data['photo_name'] = null;
    }

    // ส่งข้อมูลไปหน้า result
    return view('result', compact('data'));
})->name('workshop.submit');
