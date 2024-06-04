const loginEffects = document.getElementById("login");
const registerEffects = document.getElementById("register");
const addingElments = document.getElementById("register-container");

registerEffects.addEventListener('click',event=>{
    elementRegister = document.createElement('form');
    elementRegister.innerHTML = `
    <input  name="age" min="1900-01-01" max="2050-12-31" type="date" placeholder="день месяц год" required> 
        <input name="login" type="text" placeholder="Логин" required>
        <input name="password" type="password" placeholder="Пароль" required>
        <input name="reg" type="submit" value="Регистрация">
    `;
    elementRegister.setAttribute("action","verification.php");
    elementRegister.setAttribute("method","post");
    addingElments.appendChild(elementRegister);
})

loginEffects.addEventListener('click',event=>{
    elementLogin = document.createElement('form');
    elementLogin.innerHTML = `
    <input name="login" type="text" placeholder="Логин" required>
        <input name="password" type="password" placeholder="Пароль" required>
       <input name="enter" type="submit" value="Вход">
    `;
    elementLogin.setAttribute("action","verification.php");
    elementLogin.setAttribute("method","post");
    addingElments.appendChild(elementLogin);
})