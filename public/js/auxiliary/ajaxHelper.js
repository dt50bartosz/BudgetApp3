export class AjaxHelper {
    sendAjaxRequest(type, url, formData, successCallback, errorCallback) {
        $.ajax({
            type: type,
            url: url,
            data: formData,
            dataType: 'json',
            success: (response) => {
                if (response.status === 'success') {
                    successCallback(response);
                } else {
                    errorCallback(response);
                }
            },
            error: (xhr, status, error) => {
                console.error('AJAX error:', status, error);
                console.error('Response:', xhr.responseText);
                alert('An error occurred. Please try again.');
                
            }
        });
    }
}
