// document.getElementById('updatePassword').addEventListener('submit',async (e)=>{
//     e.preventDefault();
//     const formData = {
//         password: document.getElementById('password').value,
//         new_password:document.getElementById('new_password').value,
//         confirm_password:document.getElementById('confirm_password').value,
//     }
//     const response = await fetch('/user/update', {
//         method: 'POST', 
//         headers: {
//           'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(formData)
//     });

//     let data = await response.text();
// });