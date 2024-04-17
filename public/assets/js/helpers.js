// const parseData = (data) => {
//     return JSON.parse(data[Object.keys(data)[1]])
// }
// const update = (data) => {
//     data = parseData(data)
//     Object.keys(data).forEach(function (value) {
//         const inputElement = document.getElementById(`${value}`);
//         if (inputElement) {
//             inputElement.value = data[value];
//         }
//     });
// }

// const remove = ({data, nameDiv, deleteKeyTitle}) => {
//     data = parseData(data)
//     const stringHtml = document.getElementById(nameDiv);
//     stringHtml.innerHTML = `Tem certeza que deseja remover ${data[deleteKeyTitle] ?? data.name} ?`;
// }

// const initializeModal = ({modalId, appIdElement, buttonElement, formSelector, querySelector, nameDivModal, deleteKeyTitle}) => {
//     const modal = document.getElementById(modalId);
//     const appId = document.getElementById(appIdElement);
//     const button = document.getElementById(buttonElement);
//     const closeModalButtons = document.querySelectorAll('.closeModal');
//     document.querySelectorAll(`.${querySelector}`).forEach(function (trigger) {
//         trigger.addEventListener('click', function () {
//             modal.classList.remove('invisible');
//             const data = trigger.dataset;
//             if(querySelector === 'update'){
//                 update(data)
//             }else{
//                 remove({data, nameDiv: nameDivModal, deleteKeyTitle})
//             }

//             appId.value = trigger.dataset.modalId;
//             button.addEventListener('click', function () {
//                 const form = document.querySelector(`.${formSelector}`);
//                 form.method = 'POST';
//                 form.action = trigger.dataset.url;
//                 form.submit();
//             });
//         })
//     })

//     closeModalButtons.forEach(function (closeModalButton) {
//         closeModalButton.addEventListener('click', function () {
//             modal.classList.add('invisible');
//         });
//     });
// }
