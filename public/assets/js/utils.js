document.addEventListener("DOMContentLoaded", function () {

    const children = document.querySelectorAll('.parentListItem');

    // Adicionando evento de clique para cada elemento
    children.forEach(child => {
        child.addEventListener('click', function (event) {
            // Obtendo referência ao elemento <li> pai
            const parentListItem = this.closest('li.parentListItem');

            if (parentListItem) {
                parentListItem.classList.toggle("showMenu");
            }
        });
    });



    document.querySelector(".bx-menu").addEventListener("click", function () {
        let sidebar = document.querySelector(".sidebar");
        sidebar.classList.toggle("close");
    });




    // funcionalidade para tabs
    const buttonsTab = document.querySelectorAll(".buttons-tab button");
    Array.from(buttonsTab).forEach(item => {
        item.addEventListener("click", function (e) {

            buttonsTab.forEach(button => {
                button.classList.remove('active-tab');
            });

            e.target.classList.add('active-tab');

            const content = e.target.dataset.tabName;

            const allTables = document.querySelectorAll('table[data-tab-content]');
            allTables.forEach(table => {
                table.classList.add('hidden');
            });

            const elementCurrent = document.querySelector(`table[data-tab-content="${content}"]`);
            if (elementCurrent) {
                elementCurrent.classList.remove('hidden');
            }
        });
    });


});
