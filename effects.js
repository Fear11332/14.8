const loginEffects = document.getElementById("login");
const addingElments = document.getElementById("register-container");
activeField = true;

loginEffects.addEventListener('click', () => {
    if (activeField) {
        // Создаем первый контейнер формы
        const formContainer1 = document.createElement('div');
        formContainer1.setAttribute("id", "login-register");

        // Добавляем первую форму в первый контейнер
        const addElement = document.createElement('form');
        addElement.innerHTML = `
            <input  name="age" min="1900-01-01" max="2050-12-31" type="date" placeholder="день месяц год" required> 
            <input name="login" type="text" placeholder="Логин" required>
            <input name="password" type="password" placeholder="Пароль" required>
            <input name="reg" type="submit" value="Регистрация">
        `;
        addElement.setAttribute("action", "verification.php");
        addElement.setAttribute("method", "post");
        formContainer1.appendChild(addElement);

        // Добавляем первый контейнер формы в основной контейнер
        addingElments.appendChild(formContainer1);

        // Создаем второй контейнер формы
        const formContainer2 = document.createElement('div');
        formContainer2.setAttribute("id", "login-register2");

        // Добавляем вторую форму во второй контейнер
        const addElement2 = document.createElement('form');
        addElement2.innerHTML = `
            <input name="login" type="text" placeholder="Логин" required>
            <input name="password" type="password" placeholder="Пароль" required>
            <input name="enter" type="submit" value="Вход">
        `;
        addElement2.setAttribute("action", "verification.php");
        addElement2.setAttribute("method", "post");
        formContainer2.appendChild(addElement2);

        // Добавляем второй контейнер формы в основной контейнер
        addingElments.appendChild(formContainer2);

        activeField = false;
    } else if (!activeField) {
        // Удаляем первый контейнер формы
        const addedElement = document.getElementById("login-register");
        addingElments.removeChild(addedElement);
        const addedElement2 = document.getElementById("login-register2");
        addingElments.removeChild(addedElement2);
        activeField = true;
    }
});

