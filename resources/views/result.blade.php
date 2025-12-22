<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สรุปข้อมูลการลงทะเบียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body { font-family: 'Sarabun', sans-serif; background: #f3f4f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; py-5; }
        .card-result { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 500px; overflow: hidden; position: relative; }

        /* Header แบบมีส่วนโค้ง */
        .card-header-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 150px;
            width: 100%;
        }

        .card-body { padding: 0 30px 30px 30px; margin-top: -75px; /* ดึงเนื้อหาขึ้นไปทับ Header */ }

        .info-item { display: flex; justify-content: space-between; margin-bottom: 12px; border-bottom: 1px dashed #eee; padding-bottom: 8px; }
        .label { font-weight: bold; color: #666; font-size: 0.95rem; }
        .value { color: #333; font-weight: 500; text-align: right; }
    </style>
</head>
<body>

    <div class="card-result">
        <div class="card-header-bg"></div>

        <div class="card-body">

            <div class="text-center mb-4">
                @if(!empty($data['photo_name']))
                    <img src="{{ asset('uploads/' . $data['photo_name']) }}"
                         alt="Profile Photo"
                         class="shadow"
                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 5px solid white;">
                @else
                    <div class="d-inline-flex align-items-center justify-content-center bg-secondary text-white shadow"
                         style="width: 150px; height: 150px; border-radius: 50%; border: 5px solid white;">
                        <i class="bi bi-person-fill" style="font-size: 4rem;"></i>
                    </div>
                @endif

                <h3 class="mt-3 mb-1">{{ $data['first_name'] ?? 'ชื่อ' }} {{ $data['last_name'] ?? 'สกุล' }}</h3>
                <span class="badge bg-success rounded-pill"><i class="bi bi-check-circle-fill"></i> ลงทะเบียนสำเร็จ</span>
            </div>

            <div class="info-item mt-4">
                <span class="label"><i class="bi bi-cake2"></i> วันเกิด</span>
                <span class="value">{{ $data['birthDate'] ?? '-' }}</span>
            </div>

            <div class="info-item">
                <span class="label"><i class="bi bi-hourglass-split"></i> อายุ</span>
                <span class="value">{{ $data['age'] ?? 0 }} ปี</span>
            </div>

            <div class="info-item">
                <span class="label"><i class="bi bi-gender-ambiguous"></i> เพศ</span>
                <span class="value">{{ $data['gender'] ?? '-' }}</span>
            </div>

            <div class="info-item">
                <span class="label"><i class="bi bi-geo-alt"></i> ที่อยู่</span>
                <span class="value" style="max-width: 60%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{ $data['address'] ?? '-' }}
                </span>
            </div>

            <div class="info-item">
                <span class="label"><i class="bi bi-palette"></i> สีที่ชอบ</span>
                <span class="value" style="color: {{ match($data['favColor'] ?? '') { 'แดง'=>'red', 'เขียว'=>'green', 'น้ำเงิน'=>'blue', 'เหลือง'=>'#dbb400', 'ม่วง'=>'purple', 'ดำ'=>'black', default=>'black' } }}">
                    {{ $data['favColor'] ?? '-' }} <i class="bi bi-circle-fill"></i>
                </span>
            </div>

            <div class="info-item" style="border-bottom: none;">
                <span class="label"><i class="bi bi-music-note-beamed"></i> แนวเพลง</span>
                <span class="value">
                    @if(isset($data['music']) && is_array($data['music']))
                        {{ implode(', ', $data['music']) }}
                    @else
                        -
                    @endif
                </span>
            </div>

            <a href="{{ url('/html101') }}" class="btn btn-outline-primary w-100 rounded-pill mt-3">
                <i class="bi bi-arrow-left"></i> กลับหน้าหลัก
            </a>
        </div>
    </div>

</body>
</html>
