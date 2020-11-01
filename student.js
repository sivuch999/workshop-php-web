$('#submit').on('click', function(event){

    let student_val = $('#student').val();
    console.log(student_val)
    let formData = new FormData();
    formData.append('nickname', student_val);

    fetch('http://192.168.64.2/workshop-php-api/advance.php', {
        method: 'post',
        body: formData
    }).then(async (result) => {
        if (result) {
            $('tbody').html('');
            response = await result.json();
            let data = response.value;
            if (data && data.length > 0) {
                data.forEach((element, key) => {
                    $('tbody').append(`
                        <tr>
                            <th>${element.code}</th>
                            <th>${element.nickname}</th>
                            <th>${element.fullname}</th>
                        </tr>
                    `);
                });
            } else {
                $('tbody').append(`<tr><td colspan="2">ไม่พบข้อมูล</td></tr>`);
            }
        }
    });
});