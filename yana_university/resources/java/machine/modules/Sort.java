package modules;

import java.util.*;

public class Sort {
    // バブルソート
    public static void makeList() {
        Scanner scanner = new Scanner(System.in);
        ArrayList<Integer> list = new ArrayList<Integer>();
        int count = 0;
        System.out.print("バブルソートに使う数列の長さを決めてください：");
        count = scanner.nextInt();
        for (int i = 0; i < count; i++) {
            System.out.print(i + 1 + "番目の値：");
            list.add(scanner.nextInt());
        }
        for (int i = 0;i < list.size() - 1; i++) {
            for (int j = list.size() - 1; j > i; j--) {
                if (list.get(j - 1) > list.get(j)) {
                    int tmp = list.get(j - 1);
                    list.set(j - 1, list.get(j));
                    list.set(j, tmp);
                }
            }
        }
        for (int a: list) {
            System.out.print (a + " ");
        }
    }
}