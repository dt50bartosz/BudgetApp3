export class ModalHandler {


    
    openModal(formId, selectedId) {
        const input = $('<input>', {
            type: 'hidden',
            name: 'selectedId',
            value: selectedId
        });
        $(formId).append(input);
        $('.modal').show();
    }

    closeModal(formId, messageSelector) {
        $('.modal').hide();
        const form = $(formId);
        form[0].reset();
        $(messageSelector).html('');
    }
}
