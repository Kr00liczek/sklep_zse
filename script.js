function formatDate(input) 
{
    let value = input.value.replace(/\D/g, '');
    
    if (value.length > 2) 
        {value = value.slice(0, 2) + ' / ' + value.slice(2, 6);}

    input.value = value;
}



function formatPostalCode(input) 
{

    let value = input.value.replace(/\D/g, '');
    
    if (value.length > 2) 
        {value = value.slice(0, 2) + '-' + value.slice(2, 6);}
    
    input.value = value;
}



function formatWithSpaces(input) 
{
    let value = input.value.replace(/\D/g, '');

    if (value.length > 16) 
        {value = value.slice(0, 16);}

    value = value.replace(/(.{4})/g, '$1 ').trim();

    input.value = value;
}