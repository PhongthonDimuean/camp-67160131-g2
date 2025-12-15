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
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f0f2f5;
        }
        .form-box {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        .form-label {
            color: #555;
            margin-top: 5px;
        }
        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
            border-color: #ced4da; /* เพิ่มเพื่อให้สีของ icon-group ไม่เปลี่ยนถ้าไม่มี validation */
        }

        /* ปรับสไตล์ของ input/select/textarea เมื่อมีการโต้ตอบ */
        .form-control, .form-select, .form-control:focus, .form-select:focus {
            border-left: none;
            border-color: #ced4da;
            border-bottom: 1px solid #ced4da; /* ค่าเริ่มต้น */
            box-shadow: none;
        }
        .form-control:focus, .form-select:focus {
            border-color: #ced4da;
            border-bottom: 2px solid #0d6efd; /* สีกรอบตอน Focus */
        }

        /* 🎨 สไตล์สำหรับ Validation ที่ปรับปรุง */
        .is-invalid {
            border-bottom: 2px solid #dc3545 !important; /* สีแดง */
        }
        .is-valid {
            border-bottom: 2px solid #198754 !important; /* สีเขียว */
        }
        /* แก้ไขสีขอบของ input-group-text ให้เข้ากับสถานะ validation */
        .input-group:has(.is-invalid) > .input-group-text {
            border-color: #dc3545;
        }
        .input-group:has(.is-valid) > .input-group-text {
            border-color: #198754;
        }

        /* สำหรับ Radio/Checkbox ที่ไม่มีกรอบ */
        .form-check-group .invalid-feedback {
            display: none; /* ซ่อนไว้ก่อน */
            margin-top: 0.25rem;
        }
        .form-check-group.is-invalid .invalid-feedback {
            display: block; /* แสดงเมื่อมี error */
            color: #dc3545;
        }

    </style>
</head>
<body>

<div class="container mt-5 mb-5">

    <form class="form-box" id="workshopForm" novalidate> <h2 class="text-center mb-5 text-primary fw-bold">
            <i class="bi bi-person-lines-fill"></i> ลงทะเบียนสมาชิก
        </h2>

        <div class="row mb-3">
            <label for="first_name" class="col-sm-4 col-form-label text-sm-end fw-bold">ชื่อ :</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="first_name" placeholder="ระบุชื่อจริง" required>
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
                    <input type="text" class="form-control" id="last_name" placeholder="ระบุนามสกุล" required>
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
                    <input type="date" class="form-control" id="birthDate" required>
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
                    <input type="number" class="form-control" id="age" placeholder="ระบุอายุ" min="1" max="120" required>
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
                <input type="file" class="form-control" id="photo" accept="image/*" required>
                <div class="invalid-feedback">กรุณาอัปโหลดรูปโปรไฟล์</div>
                <div class="valid-feedback">อัปโหลดสำเร็จ</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="address" class="col-sm-4 col-form-label text-sm-end fw-bold">ที่อยู่ :</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <textarea class="form-control" id="address" rows="3" placeholder="ระบุที่อยู่ปัจจุบัน" required></textarea>
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
                    <select class="form-select" id="favColor" required>
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
                    <input class="form-check-input" type="checkbox" name="music" id="pop" value="Pop">
                    <label class="form-check-label" for="pop">ป็อป</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="music" id="rock" value="Rock">
                    <label class="form-check-label" for="rock">ร็อก</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="music" id="jazz" value="Jazz">
                    <label class="form-check-label" for="jazz">แจ๊ส</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="music" id="other_music" value="Other">
                    <label class="form-check-label" for="other_music">อื่นๆ</label>
                </div>
                <div class="invalid-feedback">กรุณาเลือกแนวเพลงอย่างน้อย 1 แนว</div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row mb-4">
            <div class="col-12 text-center form-check-group" id="consentGroup">
                <div class="form-check d-inline-block">
                    <input class="form-check-input" type="checkbox" id="consent" required>
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
    /**
     * Helper function to apply Bootstrap Validation classes
     * @param {HTMLElement} element - The input/select/textarea element
     * @param {boolean} isValid - true for valid (green), false for invalid (red)
     */
    function applyValidationClasses(element, isValid) {
        if (isValid) {
            element.classList.remove('is-invalid');
            element.classList.add('is-valid');
        } else {
            element.classList.remove('is-valid');
            element.classList.add('is-invalid');
        }
    }

    /**
     * Helper function to apply Validation classes to a Radio/Checkbox Group
     * @param {HTMLElement} groupElement - The container element (e.g., div with id 'genderGroup')
     * @param {boolean} isValid - true for valid (hide feedback), false for invalid (show feedback)
     */
    function applyGroupValidationClasses(groupElement, isValid) {
        if (isValid) {
            groupElement.classList.remove('is-invalid');
        } else {
            groupElement.classList.add('is-invalid');
        }
    }

    // 1. ฟังก์ชันคำนวณอายุอัตโนมัติ (และตรวจสอบเมื่อวันที่เปลี่ยน)
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

        // ตรวจสอบอายุหลังจากคำนวณ
        if (ageInput.value > 0) {
            applyValidationClasses(birthDateInput, true);
            applyValidationClasses(ageInput, true);
        } else {
            applyValidationClasses(birthDateInput, false);
            applyValidationClasses(ageInput, false);
        }
    });

    // 2. ฟังก์ชันตรวจสอบเมื่อกด Submit
    document.getElementById('workshopForm').addEventListener('submit', function(event) {
        event.preventDefault(); // หยุดการส่งฟอร์ม

        // ล้างสถานะ validation เดิมทั้งหมดก่อนเริ่มตรวจสอบใหม่
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

        // 📝 A. ตรวจสอบ Text, Date, Number, File, Select, Textarea
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
            } else if (element.tagName === 'SELECT') {
                isValid = !!value; // ตรวจสอบว่าไม่ใช่ค่า ""
            } else {
                isValid = !!value;
            }

            if (!isValid) {
                formIsValid = false;
            }
            applyValidationClasses(element, isValid);
        });

        // 📝 B. ตรวจสอบ Radio Group (เพศ)
        const gender = document.querySelector('input[name="gender"]:checked');
        const genderGroup = document.getElementById('genderGroup');
        const isGenderValid = !!gender;
        if (!isGenderValid) {
            formIsValid = false;
        }
        applyGroupValidationClasses(genderGroup, isGenderValid);

        // 📝 C. ตรวจสอบ Checkbox Group (แนวเพลง)
        const music = document.querySelectorAll('input[name="music"]:checked');
        const musicGroup = document.getElementById('musicGroup');
        const isMusicValid = music.length > 0;
        if (!isMusicValid) {
            formIsValid = false;
        }
        applyGroupValidationClasses(musicGroup, isMusicValid);

        // 📣 แสดงผลสรุป
        if (formIsValid) {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            alert("✅ ลงทะเบียนสำเร็จ!\nยินดีต้อนรับคุณ " + firstName + " " + lastName + "\n\nข้อมูลของคุณพร้อมส่งไปยัง Backend แล้ว");
            // ** ไม่มีการเปลี่ยนหน้า (Default behavior) **
        } else {
            // เลื่อนไปที่ช่องแรกที่ผิดพลาด
            const firstInvalid = document.querySelector('.is-invalid, .form-check-group.is-invalid');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            alert("⚠️ พบข้อผิดพลาดในการกรอกข้อมูล กรุณาตรวจสอบช่องสีแดง");
        }
    });

    // 3. ปรับปรุงการตรวจสอบ Radio/Checkbox แบบทันที (optional แต่ช่วยให้ใช้งานง่ายขึ้น)
    document.querySelectorAll('input[name="gender"], input[name="music"], #consent').forEach(input => {
        input.addEventListener('change', function() {
            // สำหรับ Radio/Checkbox Groups
            if (this.name === 'gender' || this.name === 'music') {
                const groupElement = this.closest('.form-check-group');
                const checkedCount = document.querySelectorAll(`input[name="${this.name}"]:checked`).length;
                applyGroupValidationClasses(groupElement, checkedCount > 0);
            }
            // สำหรับ Consent
            else if (this.id === 'consent') {
                const groupElement = this.closest('.form-check-group');
                applyGroupValidationClasses(groupElement, this.checked);
            }
        });
    });

</script>

</body>
</html>
