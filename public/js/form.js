const onDataPopup = (name, data = {}) => {
    const popup = $(`[id=${name}]`);

    for (const key in data) {
        const input = popup.find(`[name="${key}"]`);

        if (input) {
            input.val(data[key]);
        }
    }

    $(`[id=${name}]`).addClass('active');
};