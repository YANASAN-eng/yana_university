package machine;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Operations {
    /**
     * 和
     * 
     * @param Node x
     * @param Node y
     * 
     * @return Node
     */
    public static Node add(Node x, Node y) {
        Node z = new Node();
        z.value = x.value + y.value;
        x.self_diff = 1;
        y.self_diff = 1;
        x.children.add(z);
        y.children.add(z);
        z.parents.add(x);
        z.parents.add(y);
        return z;
    }
}