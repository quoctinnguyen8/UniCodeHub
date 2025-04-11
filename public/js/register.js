const checkbox = document.getElementById('is_dnc_student');
        const studentFields = document.getElementById('student_fields');

        checkbox.addEventListener('change', function() {
            studentFields.style.display = this.checked ? 'block' : 'none';
        });

         
        if (checkbox.checked) {
            studentFields.style.display = 'block';
        }
        