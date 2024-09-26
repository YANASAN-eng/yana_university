import modules.*;
import java.util.*;
import java.util.function.Function;

public class Test {
    public static void main(String[] args) {
        try {
            Node[] x = new Node[2];
            Node[] y = new Node[2];
            double[][] W1 = {
                {1, 2, 3, 4},
                {3, 4, 5, 7},
                {-7, 8, 2, 1},
                {0.09, -0.3, 7, 7}
            };
            double[] b1 = {0, 0, 1, 7};
            List<Function<Node, Node>> fs1 = new ArrayList<>();
            fs1.add(Functions.square);
            fs1.add(Functions.identity);
            // double[][] W2 = {
            //     {3, 4},
            //     {2, 1},
            //     {2, 0}
            // };
            // double[] b2 = {0, 0};
            // List<Function<Node, Node>> fs2 = new ArrayList<>();
            // fs2.add(Functions.cube);
            // fs2.add(Functions.square);
            Layer layer1 = new Layer(W1, b1);
            // Layer layer2 = new Layer(W2, b2);
            
            double[] X = {1, 3, 6, -0};
            x = Operator.castNode(X);
            y = Operator.connection(x, layer1);
            double[] t = {3, 5, 7, -12};
            // for (int i = 0; i < 100; i++) {
                Operator.GDM(x, t, 0.01, layer1);
            // }
            y = Operator.connection(x, layer1);
            layer1.showChildren();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    public static void display(Node[] x) {
        for (int i = 0; i < x.length; i++) {
            if ( i < x.length - 1) {
                System.out.print(x[i].value + " ");
            } else {
                System.out.println(x[i].value + " ");
            }
        }
    }
}