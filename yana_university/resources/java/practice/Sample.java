import java.util.ArrayList;
import java.util.List;

public class Sample {
    public static void main(String[] args) {
        List<String> list1 = new ArrayList<String>();
        list1.add("Hello");
        list1.add("B");
        list1.add("C");
        list1.add(0, "a");
        list1.add(null);
        System.out.println("link1:" + list1);
        List<String> list2 = new ArrayList<String>();
        list2.add("あ");
        list2.add("い");
        list2.add("う");
        System.out.println("list2:" + list2);
        list1.addAll(list2);
        list1.set(0, "ウィース");
        System.out.println(list1.get(0));
        list2.clear();
        list1.remove(0);
        System.out.println(list1);
        System.out.println(list2);
    }
}