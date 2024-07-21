<script>
    $(document).ready(function () {
        $('#name').select2({
            ajax: {
                url: '{{ route('client.products.json') }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            placeholder: placeholder,
            minimumInputLength: 2,
            templateResult: formatOption,
            templateSelection: formatOptionSelection
        });

        function formatOption(option) {
            if (!option.id) {
                return option.name;
            }
            let option_html = $('<div></div>');
            option_html.text(option.name + " - " + numberFormat(option.amount) + " UZS " /*+ option.measurement.short*/);
            return option_html;
        }

        function formatOptionSelection(option) {
            var table = $('#cart');
            table.empty();
            var short = '';
            if (option.measurement) {
                short = option.measurement.short;
            }
            var amount = '';
            if (option.amount) {
                amount = numberFormat(option.amount)
            }
            table.append("" +
                "<td style='text-align: left'>#</td>" +
                "<td style='text-align: left'>" + option.bar_code + "</td>" +
                "<td style='text-align: left'>" + option.name + "</td>" +
                "<td style='text-align: right' id='amount' data-source='" + amount + "'>" + amount + " сум</td>" +
                "<td style='text-align: right;'><input style='text-align: right; width: 100%;' type='number' id='add_qty' name='qty_'" + option.id + " " + "onchange='getTotal(this)' value='1' min='1'></td>" +
                "<td style='text-align: right'>" + short + "</td>" +
                "<td style='text-align: right' id='total_amount'>" + amount + " сум</td>" +
                "<td>" +
                "<input style='padding:.0rem .75rem' type='button' id='add_product' name='add_product' class='btn btn-primary' data-id='" + option.id + "' onclick='addProduct()' value='+'>" +
                " <button style='padding:.0rem .75rem' class='btn btn-danger' data-id='" + option.id + "' type='submit' onclick='remove(this)'>x</button></td>" +
                "");
        }

        function numberFormat(input) {
            try {
                var amount = parseInt(input);
                if (isNaN(amount)) {
                    return 0;
                }
            } catch (error) {
                return 0;
            }
            amount = amount / 100;
            return formatNumber(amount);
        }

        function formatNumber(number) {
            const numberString = number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            return numberString.replace(".", ",");
        }

        function calculateTotal(input) {
            var row = input.parentNode.parentNode;
            var quantity = parseFloat(input.value);
            var amount = parseFloat(row.cells[4].innerText);
            var total = quantity * amount;
            var totalCell = row.cells[6];
            totalCell.innerText = total.toFixed(2);
        }
    });


    $("#name").select2({
        placeholder: "Поиск товара по названию или артикулу",
        allowClear: true
    });
</script>
