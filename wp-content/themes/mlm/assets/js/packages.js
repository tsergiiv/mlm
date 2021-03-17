function processPackages(json, lang) {
    $.each(json, function(i, val) {
        $('.packages-section__cols').append(generateHTML(i + 1, val, lang));
    });
}

function generateHTML(n, package, lang) {
    let result = `
        <div class="packages-section__col">
            <div class="packages-col__number flex">
                <img alt="Silver" src="/landing-assets/img/package-${ n }.png">
                    <span>${ n }</span>
            </div>
            <div class="packages-col__info">
                <div class="packages-info__name package-name-${ n }">
                    ${ package['package_name'] }
                </div>
                <div class="packages-info__nums single-package">
                    <span class="bebas-normal">$${ package['package_price'] }</span>
                    Цена пакета
                </div>
                <div class="packages-info__nums single-package">
                    <span class="bebas-normal">${ package['package_profit'] }</span>
                    Пасивный доход в год
                </div>
            </div>
            <a class="packages-info__plus" href="/${ lang }/package/${ n }"><img alt="" src="/landing-assets/img/plus.svg"></a>
        </div>`;
    return result;
}