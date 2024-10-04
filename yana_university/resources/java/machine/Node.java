package machine;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Node {
    // 値
    public double value;
    // 自己微分
    public double self_diff;
    // 目的微分
    public double opt_diff;
    // 子ノード
    ArrayList<Node> children;
    // 親ノード
    ArrayList<Node> parents;
}