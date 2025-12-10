#include <stdio.h>

int main() {
    // Deklarasi variabel
    float rupiah, dollar, yen, lira;
    int pilihan;

    // Nilai tukar mata uang
    const float KURS_DOLLAR = 16000.0;
    const float KURS_YEN = 102.0;
    const float KURS_LIRA = 450.0;

    // Header program
    printf("================================================\n");
    printf("     PROGRAM KONVERSI MATA UANG RUPIAH\n");
    printf("================================================\n\n");

    // Input nilai Rupiah
    printf("Masukkan nilai Rupiah (Rp): ");
    scanf("%f", &rupiah);

    // Validasi input
    if (rupiah < 0) {
        printf("\nError: Nilai Rupiah tidak boleh negatif!\n");
        return 1;
    }

    // Menu pilihan konversi
    printf("\n--- Pilih Mata Uang Tujuan ---\n");
    printf("1. Dollar (USD) - Kurs: Rp %.0f\n", KURS_DOLLAR);
    printf("2. Yen (JPY) - Kurs: Rp %.0f\n", KURS_YEN);
    printf("3. Lira (TRY) - Kurs: Rp %.0f\n", KURS_LIRA);
    printf("4. Semua Mata Uang\n");
    printf("-------------------------------\n");
    printf("Pilihan Anda (1-4): ");
    scanf("%d", &pilihan);

    printf("\n================================================\n");
    printf("              HASIL KONVERSI\n");
    printf("================================================\n");
    printf("Nilai Rupiah: Rp %.2f\n\n", rupiah);

    // Proses konversi berdasarkan pilihan
    switch(pilihan) {
        case 1:
            dollar = rupiah / KURS_DOLLAR;
            printf("Konversi ke Dollar: $ %.2f USD\n", dollar);
            break;

        case 2:
            yen = rupiah / KURS_YEN;
            printf("Konversi ke Yen: ¥ %.2f JPY\n", yen);
            break;

        case 3:
            lira = rupiah / KURS_LIRA;
            printf("Konversi ke Lira: ₺ %.2f TRY\n", lira);
            break;

        case 4:
            dollar = rupiah / KURS_DOLLAR;
            yen = rupiah / KURS_YEN;
            lira = rupiah / KURS_LIRA;

            printf("Konversi ke Dollar: $ %.2f USD\n", dollar);
            printf("Konversi ke Yen   : ¥ %.2f JPY\n", yen);
            printf("Konversi ke Lira  : ₺ %.2f TRY\n", lira);
            break;

        default:
            printf("Pilihan tidak valid!\n");
            return 1;
    }

    printf("================================================\n");

    return 0;
}
