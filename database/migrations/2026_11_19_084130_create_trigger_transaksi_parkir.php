
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared(
            'DROP TRIGGER IF EXISTS before_update_transaksi_waktu_keluar'
        );

        DB::unprepared('
            CREATE TRIGGER before_update_transaksi_waktu_keluar
            BEFORE UPDATE ON tb_transaksi
            FOR EACH ROW
            BEGIN
                DECLARE tarif_jam DECIMAL(12,2);

                IF NEW.waktu_keluar IS NOT NULL
                    AND (
                        OLD.waktu_keluar IS NULL
                        OR NEW.waktu_keluar <> OLD.waktu_keluar
                    )
                THEN
                    SET NEW.durasi_jam = TIMESTAMPDIFF(
                        HOUR,
                        NEW.waktu_masuk,
                        NEW.waktu_keluar
                    );

                    SELECT tarif_per_jam
                    INTO tarif_jam
                    FROM tb_tarif
                    WHERE id_tarif = NEW.id_tarif;

                    SET NEW.biaya_total = NEW.durasi_jam * tarif_jam;
                END IF;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared(
            'DROP TRIGGER IF EXISTS before_update_transaksi_waktu_keluar'
        );
    }
};
