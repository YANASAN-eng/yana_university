let lecture_select = document.getElementById("lecture-id");
let field_select = document.getElementById("field-id");
let chapter_select = document.getElementById("chapter-id");


lecture_select.addEventListener('change', () => {
   let lecture_id = lecture_select.value;

   fetch('/select/fields/' + lecture_id)
    .then(response => response.json())
    .then(data => {
        updateSelectOptions(field_select, data);
    })
    .catch(error => console.error('Error', error));
});

field_select.addEventListener('change', () => {
    let field_id = field_select.value;
 
    fetch('/select/chapters/' + field_id)
     .then(response => response.json())
     .then(data => {
         updateSelectOptions(chapter_select, data);
     })
     .catch(error => console.error('Error', error));
 });


/**
 * 選択項目を更新
 * 
 * @param Element select_element
 * @param JSON option_data
 * @return void
 */
function updateSelectOptions(select_element, option_data) {
    select_element.innerHTML = '';

    let default_option = document.createElement('option');
    default_option.value = '';
    default_option.textContent = '選択してください';
    select_element.appendChild(default_option);

    if (!Array.isArray(option_data)) {
        option_data = [option_data];
    }

    option_data.forEach(function (item) {
        let option = document.createElement('option');
        option.value = item.id;
        option.textContent = item.name;
        select_element.appendChild(option);
    });
}