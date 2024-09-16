package day3;

public class Practice01 {
    public static void main(String[] args) {
        // 標準入力
        int a = 0;
        System.out.println("a = " + a);
        // 入力した値が正数か調べる。
        if (a > 0) {
            System.out.println("aは正の数です。");
        } else if (a == 0) {
            System.out.println("aは0です。");
        } else {
            System.out.println("aは負の値です。");
        }
    }
}
