
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

function disableUsedOptions($table) {
    $selects = $table.find("select");
    $selects.on("change", function () {
        $selects = $table.find("select");

        if (config.debug === true) console.log("In table:");
        if (config.debug === true) console.log($table);
        if (config.debug === true) console.log("there are " + $selects.length + " selects");
        if ($selects.length <= 1) return;
        let selected = [];

        $selects.each(function (index, select) {
            if (select.value !== "") {
                selected.push(select.value);
            }
        });

        if (config.debug === true) console.log("option values, that are being deactivated: " + selected);
        if (config.debug === true) console.log($(this));
        $table.find("option").prop("disabled", false);
        for (var index in selected) {
            $table
                .find('option[value="' + selected[index] + '"]:not(:selected)')
                .prop("disabled", true);
        }
    });
    $selects.trigger("change");
}

$(document).ready(function () {
    $tables = $("table.InputfieldTable:not(.InputfieldTableSearch)");
    $tables.each(function () {
        $table = $(this);
        disableUsedOptions($table);
    });
});
