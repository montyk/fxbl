Steps to add new widgets types.

1. Add the widget type details in the widget_types DB table.
2. Create the widget view file as specified in the table(Refer to any view file in the adminwidgets/widgets view folder).
    - Give the DB id for <div class="tab-pane" id="left_tab<<<DB ID HERE>>>">
    - Give the view file name for action url <form action="<?php echo site_url('adminwidgets/generate_widget/<<<VIEW FILE NAME AS IN DB>>>'); ?>" id="tab_form" method="post" class="form-horizontal">
    - Give the db ID as value for <input type="hidden" name="widget_type_id" value="<<< DB id here >>>" />
3. Code for validations etc for the form (Refer previous widget code in widget.js - See comments.)
4. Create the widget generator in the adminwidgets/generate_widget view folder.(refer existing ones for idea).
    - 


