// validación de pago

function validateConfirmCharge(id) {

    console.log(id)
    swal({
        title: 'Pagar',
        text: "¿Estás seguro que deseas dar por pagado este cargo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {

        document.location.href="../controllers/updateController.php?a=payCharge&id="+id+""
        //success method
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


/// validaciones de usuario

function validateConfirm(id) {
    console.log('--------------------------')
    swal({
        title: 'Editar',
        text: "¿Estás seguro que deseas editar este usuario?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {

        document.location.href="../forms/edituser.php?id="+id+""
        //success method
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


function validateRemove(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar este usuario?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar este usuario',
            'success'
        )

        document.location.href="../controllers/deleteController.php?a=deleteUser&id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}



function notification(id) {

    swal({
        title: 'Enviar Notificación',
        text: "¿Quiéres proceder a enviar una notificación?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Adelante!',
            'Estás entrando al sistema de notificaciones',
            'success'
        )

        document.location.href="../forms/notificationu.php?id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}

/// validaciones de espacios

function validateConfirmSpace(id) {
    console.log('--------------------------')
    swal({
        title: 'Editar',
        text: "¿Estás seguro que deseas editar este espacio?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {

        document.location.href="../forms/editSpace.php?id="+id+""
        //success method
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


function validateRemoveSpace(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar este espacio?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar este usuario',
            'success'
        )

        document.location.href="../controllers/deleteController.php?a=deleteSpace&id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


/// validaciones de vigilantes

function validateConfirmVigilant(id) {
    console.log('--------------------------')
    swal({
        title: 'Editar',
        text: "¿Estás seguro que deseas editar a este vigilante?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {

        document.location.href="../forms/editVigilant.php?id="+id+""
        //success method
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


function validateRemoveVigilant(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar a este vigilante?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar este vigilante',
            'success'
        )

        document.location.href="../controllers/deleteController.php?a=deleteVigilant&id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}



function validateRemoveDocument(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar este documento?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar este documento',
            'success'
        )

        document.location.href="../controllers/deleteController.php?a=deleteDocument&id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}




function validateRemoveDirectory(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar este contacto?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar este contacto',
            'success'
        )

        document.location.href="../controllers/deleteController.php?a=deleteDirectory&id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


function validateRemoveSuggestion(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar esta sugerencia?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar esta sugerencia',
            'success'
        )

        document.location.href="../controllers/deleteController.php?a=deleteSuggestion&id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


function validateRemoveNotice(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar este anuncio?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar este anuncio',
            'success'
        )

        document.location.href="../controllers/deleteController.php?a=deleteNotice&id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


function validateRemoveEntry(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar este ingreso?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar este ingreso',
            'success'
        )

    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


function validateRemoveExpenditure(id) {
    console.log('--------------------------')
    swal({
        title: 'Eliminar',
        text: "¿Estás seguro que deseas eliminar este egreso?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguro',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        swal(
            '¡Eliminado!',
            'Éxito al eliminar este egreso',
            'success'
        )

        document.location.href="../controllers/deleteController.php?a=deleteExpenditure&id="+id+""
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Este proceso ha sido cancelado',
                'error'
            )
        }
    })
}


