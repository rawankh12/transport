document.addEventListener('DOMContentLoaded', function() {
    const profileBtn = document.getElementById('profile-btn');
    const themeToggleBtn = document.getElementById('mode-toggle');
    const themeIcon = themeToggleBtn.querySelector('i'); // الحصول على الأيقونة داخل زر تغيير الوضع
    const body = document.body;
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggle-btn');
    const header = document.querySelector('.header');
    const main = document.querySelector('.main');
    const footer = document.querySelector('.footer');
    const deleteSupervisorModal = document.getElementById('deleteSupervisorModal');
    const supervisorNameSpan = document.getElementById('supervisor-name');
    const supervisorIdInput = document.getElementById('supervisor-id');
    const deleteSupervisorForm = document.getElementById('deleteSupervisorForm');

    // الانتقال إلى صفحة البروفايل
    profileBtn.addEventListener('click', function() {
        window.location.href = '/profile'; // تأكد من أن هذا هو المسار الصحيح لصفحة البروفايل
    });

    // إعداد نموذج حذف المشرف
    deleteSupervisorModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const supervisorId = button.getAttribute('data-id');
        const supervisorName = button.getAttribute('data-name');

        supervisorNameSpan.textContent = supervisorName;
        supervisorIdInput.value = supervisorId;
        
        // Update the form action URL
        deleteSupervisorForm.action = deleteSupervisorForm.action.replace(/\/0$/, `/${supervisorId}`);
    });

    // تغيير الوضع من الضوء إلى الظلام والعكس
    themeToggleBtn.addEventListener('click', function() {
        const isDarkMode = body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode', !isDarkMode);
        header.classList.toggle('dark-mode', isDarkMode);
        header.classList.toggle('light-mode', !isDarkMode);
        sidebar.classList.toggle('dark-mode', isDarkMode);
        sidebar.classList.toggle('light-mode', !isDarkMode);
        footer.classList.toggle('dark-mode', isDarkMode);
        footer.classList.toggle('light-mode', !isDarkMode);

        // تغيير الأيقونة بناءً على الوضع الحالي
        if (isDarkMode) {
            themeIcon.classList.replace('lni-sun', 'lni-night');
        } else {
            themeIcon.classList.replace('lni-night', 'lni-sun');
        }

        // حفظ الوضع في Local Storage
        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
    });

    // تحميل الوضع المحفوظ من Local Storage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        const isDarkMode = savedTheme === 'dark';
        body.classList.add(`${savedTheme}-mode`);
        header.classList.add(`${savedTheme}-mode`);
        sidebar.classList.add(`${savedTheme}-mode`);
        footer.classList.add(`${savedTheme}-mode`);
        
        // تعيين الأيقونة بناءً على الوضع المحفوظ
        themeIcon.classList.add(isDarkMode ? 'lni-night' : 'lni-sun');
        themeIcon.classList.remove(isDarkMode ? 'lni-sun' : 'lni-night');
    } else {
        // الوضع الافتراضي
        body.classList.add('dark-mode');
        header.classList.add('dark-mode');
        sidebar.classList.add('dark-mode');
        footer.classList.add('dark-mode');
        themeIcon.classList.add('lni-night');
    }

    // توسيع وتضييق السايدبار والهيدر والمحتوى والفوتر
    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('expand');
        header.classList.toggle('expand');
        main.classList.toggle('expand');
        footer.classList.toggle('expand');
    });
});
