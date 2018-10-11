define(
    [
        'jquery',
        'Magento_Ui/js/modal/modal'
    ],
    function($) {
        "use strict";
        //creating jquery widget
        $.widget('Ashwin_Contact.modalForm', {
            options: {
                modalForm: '#modal-form',
                modalButton: '.open-modal-form'
            },
            _create: function() {
                this.options.modalOption = this._getModalOptions();
                this._bind();
            },
            _getModalOptions: function() {
                /**
                 * Modal options
                 */
                var options = {
                    type: 'popup',
                    responsive: true,
                    title: 'Contact for Price',
                    buttons: [{
                        text: $.mage.__('Submit'),
                        class: '',
                        click: function () {
							
							// Ajax call for save form data
							jQuery.ajax({
								url: "/magento2/callforprice/index/save",
								type: 'POST',
								data : $('#form-validate').serialize(),
								success: function(data){
									console.log(data);
									alert("Success: " + data.success);
								},
								error: function(result){
									alert('No response!' + data.success);
								}
							});
							
							// Close at end
                            this.closeModal();
                        }
                    }]
                };

                return options;
            },
            _bind: function(){
                var modalOption = this.options.modalOption;
                var modalForm = this.options.modalForm;

                $(document).on('click', this.options.modalButton,  function() {
                    //Initialize modal
                    $(modalForm).modal(modalOption);
                    //open modal
                    $(modalForm).trigger('openModal');
                });
            }
        });

        return $.Ashwin_Contact.modalForm;
    }
);