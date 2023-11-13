/**
 * @namespace _
 * @desc Fungsi-fungsi utility yang bisa diakses secara global dengan
 * menggunakan prefix _ (underscore)
 */
var _ = {
    /**
     * Melakukan format number/numeric menjadi string dipisah dalam ribuan
     * @param {string|number} number string numeric yang akan di format
     * @param {number} places jumlah digit (desimal) di belakang koma, default 0
     * @param {string} symbol currency symbol, default 'Rp'
     * @param {string} thousand pembatas ribuan, default '.'
     * @param {string} decimal pembatas angka desimal, default ','
     */
    formatMoney: function (number, places, symbol, thousand, decimal) {
        number = number || 0;
        places = !isNaN(places = Math.abs(places)) ? places : 0;
        symbol = symbol !== undefined ? symbol : 'Rp';
        thousand = thousand || '.';
        decimal = decimal || ',';
        var negative = number < 0 ? '-' : '',
            i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + '',
            j = (j = i.length) > 3 ? j % 3 : 0;
        return symbol + negative + (j ? i.substr(0, j) + thousand : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : '');
    },

    /**
     * Melakukan format number/numeric menjadi string dipisah dalam ribuan
     * @param {string|number} number string numeric yang akan di format
     * @param {number} places jumlah digit (desimal) di belakang koma, default 0
     * @param {string} thousand pembatas ribuan, default '.'
     * @param {string} decimal pembatas angka desimal, default ','
     */
    formatNumber: function (number, places, thousand, decimal) {

        number = number ? parseInt(number) : 0;
        return _.formatMoney(number, places, '', thousand, decimal);
    },

    /**
     * Represents a search trough an array.
     * @function search
     * @param {Array} array - The array you wanna search trough
     * @param {string} key - The key to search for
     * @param {string} [prop] - The property name to find it in
     */
    arraySearch: function (array, key, prop) {
        // Optional, but fallback to key['name'] if not selected
        var tmp = [];
        prop = (typeof prop === 'undefined') ? 'name' : prop;
        for (var i = 0; i < array.length; i++) {
            if (array[i][prop] === key) {
                tmp.push(array[i]);
            }
        }
        return tmp;
    },

    sumObject: function (arrayData, reVal) {
        reVal = reVal || /jml|val/;
        var prop, out = {};
        arrayData.forEach(function (obj) {
            for (prop in obj) {
                if (reVal.test(prop)) {
                    out[prop] = out[prop] || 0;
                    if (obj[prop] && !isNaN(obj[prop])) {
                        out[prop] += parseInt(obj[prop]);
                    }
                }
            }
        });
        return out;
    },

    /** UMUM */
    dpBulan: function (n) {
        var result = 'Desember';
        n = parseInt(n);
        result = (n == 1) ? 'Januari' : result;
        result = (n == 2) ? 'Februari' : result;
        result = (n == 3) ? 'Maret' : result;
        result = (n == 4) ? 'April' : result;
        result = (n == 5) ? 'Mei' : result;
        result = (n == 6) ? 'Juni' : result;
        result = (n == 7) ? 'Juli' : result;
        result = (n == 8) ? 'Agustus' : result;
        result = (n == 9) ? 'September' : result;
        result = (n == 10) ? 'Oktober' : result;
        result = (n == 11) ? 'November' : result;
        return result;
    },

    // [display] nama kabupaten
    findKabDisplay: function (n) {
        var temp = Apps.ds.listKabupaten;
        for (var i = 0; i < temp.length; ++i) {
            if ((temp[i].id_prop == n.id_prop) &&
                (temp[i].id_kab == n.id_kab)) {
                return temp[i].kabupaten;
            }
        }
    },

    // [display] nama kecamatan
    findKecDisplay: function (n) {
        var temp = Apps.ds.listKecamatan;
        for (var i = 0; i < temp.length; ++i) {
            if ((temp[i].id_prop == n.id_prop) &&
                (temp[i].id_kab == n.id_kab) &&
                (temp[i].id_kec == n.id_kec)) {
                return temp[i].kecamatan;
            }
        }
    },
    // [display] nama Kelurahan/Desa
    findKelDisplay: function (n) {
        var temp = Apps.ds.listDesa;
        for (var i = 0; i < temp.length; ++i) {
            if ((temp[i].id_prop == n.id_prop) &&
                (temp[i].id_kab == n.id_kab) &&
                (temp[i].id_kec == n.id_kec) &&
                (temp[i].id_kel == n.id_kel)) {
                return temp[i].kelurahan;
            }
        }
    },

    // [display] alamat lengkap
    dpAddress: function (n) {
        var result = '';
        result += (n.id_kab) ? this.findKabDisplay(n) : '';
        result += (n.id_kec) ? ' kec.' + this.findKecDisplay(n) : '';
        result += (n.id_kel) ? ' kel.' + this.findKelDisplay(n) : '';
        result += (n.dusun) ? ' dus.' + n.dusun : '';
        result += (n.alamat) ? ' ' + n.alamat : '';
        result += (n.rt) ? ' Rt. ' + n.rt : '';
        result += (n.rw) ? ' Rw. ' + n.rw : '';
        return result;
    },

    // [display] alamat lengkap
    dpKelamin: function (n) {
        return (parseInt(n) == 1) ? 'Laki-laki' : 'Perempuan';
    },

    // [display] sumber data
    dpSumberData: function (n) {
        var result = '';
        Apps.ds.listSumberdata.forEach(item => {
            if (parseInt(item.id_sumber_data) == parseInt(n)) {
                result = item.sumber_data;
            }
        });
        return result;
    }
};