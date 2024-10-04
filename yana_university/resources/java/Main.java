import machine.*;

public class Main {
    public static void main(String[] args) {
        Node x = new Node();
        Node y = new Node();
        x.value = 1;
        y.value = 1;
        System.out.println(Operations.add(x, y));
    }
}