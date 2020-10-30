$('#submit').on('click', function(event){

    let bank_val = $('#bank').val();
    console.log(bank_val)
    let formData = new FormData();
    formData.append('bankAccountName', bank_val);

    fetch('http://192.168.64.2/php-api/advance.php', {
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
                            <th>${element.bank_branch} (${element.bank_name})</th>
                            <th>${element.bank_account_name}</th>
                        </tr>
                    `);
                });
            } else {
                $('tbody').append(`<tr><td colspan="2">ไม่พบข้อมูล</td></tr>`);
            }
        }
    });
});