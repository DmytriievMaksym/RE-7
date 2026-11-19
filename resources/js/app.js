import './bootstrap';
import $ from 'jquery';
import select2 from 'select2';
import 'select2/dist/css/select2.css';
import duallistbox from 'bootstrap4-duallistbox'
import 'bootstrap4-duallistbox/dist/bootstrap-duallistbox.css';

window.$ = window.jQuery = $;
select2(window, $);

$(function () {
    $('#filters').select2({
        width: '340px',
        placeholder: 'Оберіть мітки',
    });
    $('#nominations-select').select2({
        width: '100%',
        placeholder: 'Оберіть номінації',
        closeOnSelect: false,
        allowClear: true,
        templateResult: function (state) {
            if (!state.id) return state.text;
            const desc = $(state.element).data('description');
            if (!desc) return state.text;

            return $(`
            <div>
                <div class="fw-semibold">${state.text}</div>
                <div class="small opacity-75">${desc}</div>
            </div>
        `);
        }
    });
    $('#nominations-filter').select2({
        width: '100%',
        placeholder: 'Оберіть номінації для фільтрації...',
        allowClear: true,
        templateResult: function (state) {
            if (!state.id) return state.text;
            const desc = $(state.element).data('description');
            const count = $(state.element).data('count') ?? 0;

            return $(`
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fw-semibold">${state.text}</div>
                    ${desc ? `<div class="small text-muted">${desc}</div>` : ''}
                </div>
                <span class="badge bg-light text-dark border rounded-pill ms-2">${count}</span>
            </div>
        `);
        },
        templateSelection: function (state) {
            if (!state.id) return state.text;
            const count = $(state.element).data('count');
            return count !== undefined ? `${state.text} (${count})` : state.text;
        }
    }).on('change', function () {
        $('#filterForm').trigger('submit');
    });
});

duallistbox(window, $);
$('#duallist').bootstrapDualListbox({
    nonSelectedListLabel: 'Доступні мітки',
    selectedListLabel: 'Обрані мітки',
    preserveSelectionOnMove: 'moved',
    moveOnSelect: false,
    infoText: 'Усього {0}',
    filterPlaceHolder: 'Пошук',
});
