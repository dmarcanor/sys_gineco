export default (context) => {
    return {
        isLoading: false,
        isReSearch: false,
        columns: [
            {
                label: "Nombre",
                field: "nombre",
                width: "10%",
                sortable: true,
                display: function (row) {
                    return (
                        '<a href="#" data-id="' + row.id + '" class="ver-btn">' + row.nombre + "</a>"
                    );
                },
            },
            {
                label: "Apellido",
                field: "apellido",
                width: "15%",
                sortable: true,
            },
            {
                label: "",
                field: "quick",
                width: "1%",
                display: function (row) {
                    return (
                        '<div class="">\n' +
                        '\n' +
                        '  <div class="dropdown inline-block relative">\n' +
                        '    <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">\n' +
                        '      <span class="mr-1">Opciones</span>\n' +
                        '      <svg class="-mr-1 ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">\n' +
                        '        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />\n' +
                        '      </svg>\n' +
                        '    </button>\n' +
                        '    <ul class="dropdown-menu absolute -top-1 -left-32 hidden text-gray-700 pt-1" style="z-index: 99;">\n' +
                        '      <li class=""><a class="rounded-t rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap ver-btn" data-id="' + row.id + '" href="'+ context.route('pacientes.ver', row.id) +'">Ver paciente</a></li>\n' +
                        '    </ul>\n' +
                        '  </div>\n' +
                        '\n' +
                        '</div>'
                    );
                },
            },
        ],
        rows: [],
        totalRecordCount: 1,
        sortable: {
            order: "created_at",
            sort: "desc",
        },
        messages: {
            pagingInfo: "Showing {0}-{1} of {2}",
            pageSizeChangeLabel: "Nro:",
            gotoPageLabel: "Ir a:",
            noDataAvailable: "Sin registros",
        },
    }
}
