<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop HTML Form - Modern Style</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    /* 🦄 GRADIENT THEME */
    body {
        font-family: 'Sarabun', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    .form-box {
        width: 100%;
        max-width: 600px;
        margin: auto;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }
    .text-primary {
        color: #764ba2 !important;
    }
    .form-label {
        color: #4a4a4a;
        margin-top: 5px;
    }

    /* Input Fields */
    .input-group-text {
        background-color: #f3e5f5;
        border-right: none;
        border-color: #e1bee7;
        color: #8e24aa;
    }
    .form-control, .form-select {
        border-left: none;
        border-color: #e1bee7;
        border-bottom: 1px solid #e1bee7;
    }

    /* Focus State */
    .form-control:focus, .form-select:focus {
        border-color: #e1bee7;
        border-bottom: 2px solid #8e24aa;
        box-shadow: none;
    }

    /* ปุ่ม */
    .btn-primary {
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #5a6fd1 0%, #683f91 100%);
        box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
    }

    /* Validation */
    .is-invalid { border-bottom: 2px solid #ff1744 !important; }
    .is-valid { border-bottom: 2px solid #00e676 !important; }

    .input-group:has(.is-invalid) > .input-group-text { border-color: #ff1744; }
    .input-group:has(.is-valid) > .input-group-text { border-color: #00e676; }

    .form-check-group.is-invalid .invalid-feedback { display: block; color: #ff1744; }
</style>
</head>
<body>

<div class="container mt-5 mb-5">

    <form class="form-box" id="workshopForm" action="{{ route('workshop.submit') }}" method="POST" enctype="multipart/form-data" novalidate>

        @csrf

        <h2 class="text-center mb-5 text-primary fw-bold">
            <i class="bi bi-person-lines-fill"></i> ลงทะเบียนสมาชิก
        </h2>

        <div class="row mb-3">
            <label for="first_name" class="col-sm-4 col-form-label text-sm-end fw-bold">ชื่อ :</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ระบุชื่อจริง" required>
                </div>
                <div class="invalid-feedback">กรุณาระบุชื่อจริง</div>
                <div class="valid-feedback">ถูกต้อง</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="last_name" class="col-sm-4 col-form-label text-sm-end fw-bold">สกุล :</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="ระบุนามสกุล" required>
                </div>
                <div class="invalid-feedback">กรุณาระบุนามสกุล</div>
                <div class="valid-feedback">ถูกต้อง</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="birthDate" class="col-sm-4 col-form-label text-sm-end fw-bold">วันเกิด :</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                    <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                </div>
                <div class="invalid-feedback">กรุณาระบุวันเกิด</div>
                <div class="valid-feedback">ถูกต้อง</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="age" class="col-sm-4 col-form-label text-sm-end fw-bold">อายุ :</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-123"></i></span>
                    <input type="number" class="form-control" id="age" name="age" placeholder="ระบุอายุ" min="1" max="120" required readonly>
                </div>
                <div class="invalid-feedback">กรุณาระบุอายุให้ถูกต้อง (ต้องเป็นตัวเลข 1 ขึ้นไป)</div>
                <div class="valid-feedback">ถูกต้อง</div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-4 col-form-label text-sm-end fw-bold">เพศ :</label>
            <div class="col-sm-8 pt-2 form-check-group" id="genderGroup">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="ชาย" required>
                    <label class="form-check-label" for="male">ชาย</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="หญิง" required>
                    <label class="form-check-label" for="female">หญิง</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_other" value="อื่นๆ" required>
                    <label class="form-check-label" for="gender_other">อื่นๆ</label>
                </div>
                <div class="invalid-feedback">กรุณาระบุเพศ</div>
                </div>
        </div>

        <div class="row mb-3">
            <label for="photo" class="col-sm-4 col-form-label text-sm-end fw-bold">รูปโปรไฟล์ :</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                <div class="invalid-feedback">กรุณาอัปโหลดรูปโปรไฟล์</div>
                <div class="valid-feedback">อัปโหลดสำเร็จ</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="address" class="col-sm-4 col-form-label text-sm-end fw-bold">ที่อยู่ :</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="ระบุที่อยู่ปัจจุบัน" required></textarea>
                </div>
                <div class="invalid-feedback">กรุณาระบุที่อยู่</div>
                <div class="valid-feedback">ถูกต้อง</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="favColor" class="col-sm-4 col-form-label text-sm-end fw-bold">สีที่ชอบ :</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-palette"></i></span>
                    <select class="form-select" id="favColor" name="favColor" required>
                        <option value="" selected disabled>เลือกสีที่ชอบ...</option>
                        <option value="แดง">สีแดง</option>
                        <option value="เขียว">สีเขียว</option>
                        <option value="น้ำเงิน">สีน้ำเงิน</option>
                        <option value="เหลือง">สีเหลือง</option>
                        <option value="ดำ">สีดำ</option>
                        <option value="ม่วง">สีม่วง</option>
                    </select>
                </div>
                <div class="invalid-feedback">กรุณาเลือกสีที่ชอบ</div>
                <div class="valid-feedback">ถูกต้อง</div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-4 col-form-label text-sm-end fw-bold">แนวเพลง :</label>
            <div class="col-sm-8 pt-2 form-check-group" id="musicGroup">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="music[]" id="pop" value="Pop">
                    <label class="form-check-label" for="pop">ป็อป</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="music[]" id="rock" value="Rock">
                    <label class="form-check-label" for="rock">ร็อก</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="music[]" id="jazz" value="Jazz">
                    <label class="form-check-label" for="jazz">แจ๊ส</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="music[]" id="other_music" value="Other">
                    <label class="form-check-label" for="other_music">อื่นๆ</label>
                </div>
                <div class="invalid-feedback">กรุณาเลือกแนวเพลงอย่างน้อย 1 แนว</div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row mb-4">
            <div class="col-12 text-center form-check-group" id="consentGroup">
                <div class="form-check d-inline-block">
                    <input class="form-check-input" type="checkbox" id="consent" name="consent" required>
                    <label class="form-check-label" for="consent">
                        ฉันยอมรับและยินยอมให้เก็บรวบรวมข้อมูล
                    </label>
                </div>
                <div class="invalid-feedback">ต้องกดยอมรับข้อตกลงก่อนลงทะเบียน</div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <button type="reset" class="btn btn-outline-secondary w-100 rounded-pill">
                    <i class="bi bi-arrow-counterclockwise"></i> ล้างค่า
                </button>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">
                    <i class="bi bi-send-fill"></i> ยืนยันข้อมูล
                </button>
            </div>
        </div>
    </form>
</div>

<script>

    function applyValidationClasses(element, isValid) {
        if (isValid) {
            element.classList.remove('is-invalid');
            element.classList.add('is-valid');
        } else {
            element.classList.remove('is-valid');
            element.classList.add('is-invalid');
        }
    }


    function applyGroupValidationClasses(groupElement, isValid) {
        if (isValid) {
            groupElement.classList.remove('is-invalid');
        } else {
            groupElement.classList.add('is-invalid');
        }
    }

    // 1. คำนวณอายุ
    const birthDateInput = document.getElementById('birthDate');
    const ageInput = document.getElementById('age');

    birthDateInput.addEventListener('change', function() {
        const dobValue = this.value;
        if (!dobValue) {
            ageInput.value = '';
            applyValidationClasses(birthDateInput, false);
            applyValidationClasses(ageInput, false);
            return;
        }

        const dob = new Date(dobValue);
        const today = new Date();

        let ageCalc = today.getFullYear() - dob.getFullYear();
        const m = today.getMonth() - dob.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
            ageCalc--;
        }

        ageInput.value = ageCalc > 0 ? ageCalc : 0;


        if (ageInput.value > 0) {
            applyValidationClasses(birthDateInput, true);
            applyValidationClasses(ageInput, true);
        } else {
            applyValidationClasses(birthDateInput, false);
            applyValidationClasses(ageInput, false);
        }
    });

    // 2. ตรวจสอบเมื่อกด Submit
    document.getElementById('workshopForm').addEventListener('submit', function(event) {
        event.preventDefault(); // หยุดการส่งฟอร์มเพื่อตรวจสอบก่อน

        // ล้าง validation เดิม
        this.querySelectorAll('.is-invalid, .is-valid').forEach(el => {
            el.classList.remove('is-invalid', 'is-valid');
        });
        this.querySelectorAll('.form-check-group.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
        });

        let formIsValid = true;
        const formElements = [
            'first_name', 'last_name', 'birthDate', 'age',
            'address', 'favColor', 'photo', 'consent'
        ];

        // ตรวจสอบ text inputs
        formElements.forEach(id => {
            const element = document.getElementById(id);
            if (!element) return;

            let value = element.value.trim();
            let isValid = true;

            if (element.type === 'file') {
                isValid = element.files.length > 0;
            } else if (element.type === 'number') {
                isValid = value && parseInt(value) > 0;
            } else if (id === 'consent') {
                isValid = element.checked;

            } else {
                isValid = !!value;
            }

            if (!isValid) formIsValid = false;
            applyValidationClasses(element, isValid);
        });

        // ตรวจสอบ Radio (เพศ)
        const gender = document.querySelector('input[name="gender"]:checked');
        const genderGroup = document.getElementById('genderGroup');
        const isGenderValid = !!gender;
        if (!isGenderValid) formIsValid = false;
        applyGroupValidationClasses(genderGroup, isGenderValid);

        // ตรวจสอบ Checkbox (เพลง) - ใช้ name="music[]"
        const music = document.querySelectorAll('input[name="music[]"]:checked');
        const musicGroup = document.getElementById('musicGroup');
        const isMusicValid = music.length > 0;
        if (!isMusicValid) formIsValid = false;
        applyGroupValidationClasses(musicGroup, isMusicValid);

        // ✅ ส่วนที่แก้ไข: ลบ Alert ออก แล้วใช้ this.submit()
        if (formIsValid) {
            // ส่งข้อมูลไปหน้าถัดไปทันที
            this.submit();
        } else {
            // ถ้าไม่ผ่าน ให้เลื่อนไปที่จุดผิดพลาด
            const firstInvalid = document.querySelector('.is-invalid, .form-check-group.is-invalid');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            alert("⚠️ พบข้อผิดพลาดในการกรอกข้อมูล กรุณาตรวจสอบช่องสีแดง");
        }
    });

    // 3. Realtime Check
    document.querySelectorAll('input[name="gender"], input[name="music[]"], #consent').forEach(input => {
        input.addEventListener('change', function() {
            if (this.name === 'gender') {
                const groupElement = this.closest('.form-check-group');
                const checkedCount = document.querySelectorAll(`input[name="gender"]:checked`).length;
                applyGroupValidationClasses(groupElement, checkedCount > 0);
            }
            else if (this.name === 'music[]') {
                const groupElement = this.closest('.form-check-group');
                const checkedCount = document.querySelectorAll(`input[name="music[]"]:checked`).length;
                applyGroupValidationClasses(groupElement, checkedCount > 0);
            }

            else if (this.id === 'consent') {
                const groupElement = this.closest('.form-check-group');
                applyGroupValidationClasses(groupElement, this.checked);
            }
        });
    });

</script>

</body>
</html>
