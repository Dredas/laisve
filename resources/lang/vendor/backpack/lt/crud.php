<?php

return [

    // Forms
    'save_action_save_and_new'         => 'Išsaugoti ir kurti naują',
    'save_action_save_and_edit'        => 'Išsaugoti ir tęsti redagavimą',
    'save_action_save_and_back'        => 'Išsaugoti ir grįžti',
    'save_action_changed_notification' => 'Numatytasis elgesys išsaugojus buvo pakeistas.',

    // Create form
    'add'                 => 'Pridėti',
    'back_to_all'         => 'Atgal į visus ',
    'cancel'              => 'Atšaukti',
    'add_a_new'           => 'Pridėti naują ',

    // Edit form
    'edit'                 => 'Redaguoti',
    'save'                 => 'Išsaugoti',

    // Revisions
    'revisions'            => 'Pataisymai',
    'no_revisions'         => 'Jokių pataisymų nerasta',
    'created_this'         => 'created this',
    'changed_the'          => 'changed the',
    'restore_this_value'   => 'Atstatyti šią reikšmę',
    'from'                 => 'iš',
    'to'                   => 'į',
    'undo'                 => 'Atgražinti',
    'revision_restored'    => 'Revision successfully restored',
    'guest_user'           => 'Svečias',

    // Translatable models
    'edit_translations' => 'Vertimas',
    'language'          => 'Kalba',

    // CRUD table view
    'all'                       => 'Visi ',
    'in_the_database'           => 'duombazėje',
    'list'                      => 'Sąrašas',
    'actions'                   => 'Veiksmai',
    'preview'                   => 'Žiūrėti',
    'delete'                    => 'Trinti',
    'admin'                     => 'Pagrindinis',
    'details_row'               => 'Tai yra detalių eilutė. Pakeiskite kaip norite.',
    'details_row_loading_error' => 'Įkeliant informaciją įvyko klaida. Pabandykite dar kartą.',
    'clone' => 'Clone',
    'clone_success' => '<strong>Entry cloned</strong><br>A new entry has been added, with the same information as this one.',
    'clone_failure' => '<strong>Cloning failed</strong><br>The new entry could not be created. Please try again.',

    // Confirmation messages and bubbles
    'delete_confirm'                              => 'Ar tikrai norite ištrinti šį įrašą?',
    'delete_confirmation_title'                   => 'Ištrinta',
    'delete_confirmation_message'                 => 'Įrašas buvo sėkmingai ištrintas.',
    'delete_confirmation_not_title'               => 'NEIŠTRINTA',
    'delete_confirmation_not_message'             => "Įvyko klaida. Jūsų įrašas gali būti neištrintas.",
    'delete_confirmation_not_deleted_title'       => 'Neištrinta',
    'delete_confirmation_not_deleted_message'     => 'Nieko neatsitiko. Tavo įrašas saugus.',

    // Bulk actions
    'bulk_no_entries_selected_title'   => 'No entries selected',
    'bulk_no_entries_selected_message' => 'Please select one or more items to perform a bulk action on them.',

    // Bulk confirmation
    'bulk_delete_are_you_sure'   => 'Are you sure you want to delete these :number entries?',
    'bulk_delete_sucess_title'   => 'Entries deleted',
    'bulk_delete_sucess_message' => ' items have been deleted',
    'bulk_delete_error_title'    => 'Ištrinti nepavyko',
    'bulk_delete_error_message'  => 'One or more items could not be deleted',

    // Ajax errors
    'ajax_error_title' => 'Klaida',
    'ajax_error_text'  => 'Įvyko klaida. Bandykite perkrauti puslapį.',

    // DataTables translation
    'emptyTable'     => 'Jokių duomenų nerasta',
    'info'           => 'Rodoma nuo _START_ iki _END_ iš _TOTAL_ įrašų',
    'infoEmpty'      => '',
    'infoFiltered'   => '(išfiltruotą iš _MAX_)',
    'infoPostFix'    => '',
    'thousands'      => ',',
    'lengthMenu'     => '_MENU_ įrašų viename puslapyje',
    'loadingRecords' => 'Kraunama...',
    'processing'     => 'Apdorojama...',
    'search'         => 'Ieškoti: ',
    'zeroRecords'    => 'Nerasta atitinkančių įrašų',
    'paginate'       => [
        'first'    => 'Pirmas',
        'last'     => 'Paskutinis',
        'next'     => 'Sekantis',
        'previous' => 'Ankstesnis',
    ],
    'aria' => [
        'sortAscending'  => ': activate to sort column ascending',
        'sortDescending' => ': activate to sort column descending',
    ],
    'export' => [
        'export'            => 'Eksportuoti',
        'copy'              => 'Kopijuoti',
        'excel'             => 'Excel',
        'csv'               => 'CSV',
        'pdf'               => 'PDF',
        'print'             => 'Spausdinti',
        'column_visibility' => 'Column visibility',
    ],

    // global crud - errors
    'unauthorized_access' => 'Unauthorized access - you do not have the necessary permissions to see this page.',
    'please_fix'          => 'Please fix the following errors:',

    // global crud - success / error notification bubbles
    'insert_success' => 'Sėkmingai pridėta!',
    'update_success' => 'Sėkmingai atnaujinta!',

    // CRUD reorder view
    'reorder'                      => 'Reorder',
    'reorder_text'                 => 'Use drag&drop to reorder.',
    'reorder_success_title'        => 'Baigta',
    'reorder_success_message'      => 'Your order has been saved.',
    'reorder_error_title'          => 'Klaida',
    'reorder_error_message'        => 'Your order has not been saved.',

    // CRUD yes/no
    'yes' => 'Taip',
    'no'  => 'Ne',

    // CRUD filters navbar view
    'filters'        => 'Filtrai',
    'toggle_filters' => 'Toggle filters',
    'remove_filters' => 'Remove filters',

    // Fields
    'browse_uploads'            => 'Browse uploads',
    'select_all'                => 'Select All',
    'select_files'              => 'Select files',
    'select_file'               => 'Select file',
    'clear'                     => 'Valyti',
    'page_link'                 => 'Page link',
    'page_link_placeholder'     => 'http://example.com/your-desired-page',
    'internal_link'             => 'Internal link',
    'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
    'external_link'             => 'External link',
    'choose_file'               => 'Choose file',

    //Table field
    'table_cant_add'    => 'Cannot add new :entity',
    'table_max_reached' => 'Maximum number of :max reached',

    // File manager
    'file_manager' => 'File Manager',
];
